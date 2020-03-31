# Refreshing data in the background in a watchOS app: a definitive guide

<div style="background: #EEE; padding: 10px; border-left: 3px solid #D9D9D9; color: gray;">This Post was written in March of 2020 for watchOS 6.2</div>

I’ve been writing a [standalone watchOS app](https://wjwickham.com/uv-forecast) recently that fetches weather data and shows it in complications. Obviously, I wanted the complications to show the most up-to-date data they could, so I turned to background refresh tasks to update my data.

Turns out, it’s more cumbersome than I anticipated. Apple’s documentation is actually pretty good, but it’s missing some crucial details, and the sample code they released when the background refresh feature debuted in watchOS 3 has disappeared. So, based on Apple’s documentation and implementations that I’ve seen others discuss, here‘s what I believe to be a fairly definitive guide to implementing background URL refreshes in a watchOS app.

We’ll look at it step-by-step, and you can see my complete implementation in the attached file, but in essence, here's how to approach this:

1. You schedule a refresh
2. System calls `handle` with a `WKApplicationRefreshBackgroundTask`
3. You schedule a background URL request
4. System calls `handle` with a `WKURLSessionRefreshBackgroundTask`
5. You reattach a background URLSession to the delegate
6. You process data and update your UI
7. You tell the system when you’re done and let it snapshot your app

## 1. Request a background refresh

You ask the system to schedule a background refresh for your app by calling `scheduleBackgroundRefresh` on your `WKExtension`. You provide a “preferred date”; the docs say that your refresh won’t happen before the preferred date, but be aware that it also won’t happen *right at* the preferred date. The system uses its knowledge of available resources to determine when (or if) your app should get its turn to refresh in the background.

    let preferredDate = Date().addingTimeInterval(60 * 60)// One hour later
    WKExtension.shared().scheduleBackgroundRefresh(withPreferredDate: preferredDate, userInfo: nil) { (error) in
			
		if error != nil {
			print("Couldn't schedule background refresh.")
		}
		
		print("Scheduled next background update task for: \(preferredDate)")
		
	}

In my testing, I was able to schedule background updates for 5 minutes in the future, and the system always gave me a background refresh opportunity within 1 minute of my scheduled preferred date. Any sooner than 5 minutes out and the system usually refused to give me an update opportunity. Apple’s documentation has this to say about the budget allocated to background refreshes:

> In general, the system performs approximately one task per hour for each app in the dock (including the most recently used app). This budget is shared among all apps on the dock. The system performs multiple tasks an hour for each app with a complication on the active watch face. This budget is shared among all complications on the watch face. After you exhaust the budget, the system delays your requests until more time becomes available.

## 2. Handle the background refresh task

The system will wake your extension sometime after your preferred date (at the system’s discretion) with a `WKRefreshBackgroundTask`.

In your extension delegate’s `handle(_:)` method, check for the `WKApplicationRefreshBackgroundTask`; instead of performing the request with a `URLSessionDataTask` here, you need to schedule a **background** URL download task so that the system can suspend your extension and perform the request on your behalf. Normal `URLSessionDataTask`s with completion closures won’t work, since they’re asynchronous; background requests are always `URLSessionDownloadTask`s.

The [example process](https://developer.apple.com/documentation/watchkit/wkapplicationrefreshbackgroundtask) outlined in the `WKRefreshBackgroundTask` docs shows the best practice for setting this up. Also see [WKURLSessionRefreshBackgroundTask](https://developer.apple.com/documentation/watchkit/wkurlsessionrefreshbackgroundtask) for details about background URL sessions.

One important detail I noticed here is that when creating the URL session, I needed to pass the extension delegate (`self`) as the session delegate — even though I would expect my extension to be suspended when the session performs the URL request:

    let configuration = URLSessionConfiguration.background(withIdentifier: "com.you.your-app.background-refresh")
	let backgroundSession = URLSession(configuration: configuration, delegate: self, delegateQueue: nil)

 My guess is that if the system deems it acceptable, it will perform the request immediately, without suspending your extension process at all. So if you don’t assign a delegate here, you might not get any further session events. If the system is never calling your extension delegate’s `handle(_:)` method with a `WKURLSessionRefreshBackgroundTask`, double check this.

## 3. Handle URL session refresh tasks

The system will perform your URL request in a separate process, and again wake your extension once it has finished. It will call your extension delegate’s `handle` method like before, this time with a `WKURLSessionRefreshBackgroundTask`. Here, you need to do two things:

1. Save the background task in an instance variable on your extension delegate. We don’t want to set it complete just yet, but we need to keep it around to set complete later when the URL request finishes.
2. Create another background URL session using the background task’s `sessionIdentifier`, and **use your extension delegate as the session’s delegate**. It’s important that you use the extension delegate as the session delegate; using another object as the delegate won’t work. If anyone can explain why, I’d love to know!

    Using the same identifier to create a second URL session allows the system to connect the session to the download that it performed for you in another process; the purpose of this second background URL session is solely to connect the delegate with the session.
    
    <pre>
    let configuration = URLSessionConfiguration.background(withIdentifier: "com.you.your-app.background-refresh"
	let _ = URLSession(configuration: configuration, delegate: self, delegateQueue: nil)
	</pre>

## 4. Process data from the request
In your extension delegate, implement both the `urlSession(_: downloadTask: didFinishDownloadingTo:)` and `urlSession(task: didCompleteWithError:)` functions from `URLSessionDownloadDelegate`.

Background URL requests are always performed as download tasks. The system performs the request and gives you a temporary file with the resulting data. In the `urlSession(_: downloadTask: didFinishDownloadingTo:)` function, the data in that file and process it as needed to update your UI.

Finally, in the delegate’s `urlSession(task: didCompleteWithError:)` function, call `setTaskCompletedWithSnapshot` to tell the system that you’ve finished your work. Phew.

***

One final note: legend has it that the watchOS simulator doesn’t handle background URL refresh tasks properly, but unfortunately, Apple’s docs have no official word on that. Best to test on Apple Watch hardware if you‘re able.

## A few tips for debugging

As I mentioned, this is all really frustrating to debug, mostly because it’s all up to the system when it these things actually take place, if they happen at all. Don’t give up.

* Whether you’re testing in the Simulator or on hardware, the `handle(_:)` method won’t be called if the app is in the foreground. Don’t forget to switch back to the watch face to background your app before the refresh happens.
