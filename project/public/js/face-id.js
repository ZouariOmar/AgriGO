/** @format */

const video = document.getElementById("video");
const refImg = document.getElementById("refImg");
let guide = document.querySelector(".alert");
let referenceDescriptor = null; // Store the reference descriptor
let faceMatcher = null;

document.addEventListener("DOMContentLoaded", () => {
	if (video)
		main().catch((err) => console.error("Error in main function:", err));
});

/**
 * @brief Main function
 */
async function main() {
	await loadModels();
	await processReferenceImage();
	startVideo();

	// const smile = await is_smile();
	// const surprised = await is_surprised();
	// const headLeft = await is_headLeft();
	// const headRight = await is_headRight();

	// Wait 1 second before starting the comparison
	if (1) {
		const { speak } = await import("./text-to-speech.js");
		console.log("last detection in progress...");
		guide.textContent = "last detection in progress...";
		speak("Stay Normal please."); // TTS func
		setTimeout(compareLiveWithReference, 5000); // Main face check
	} else
		alert(
			"No valid conditions met. Please smile and turn your head left and right."
		);
}

/**
 * @brief Function to load models
 */
async function loadModels() {
	try {
		await faceapi.nets.tinyFaceDetector.loadFromUri("../../models");
		await faceapi.nets.faceLandmark68Net.loadFromUri("../../models");
		await faceapi.nets.faceRecognitionNet.loadFromUri("../../models");
		await faceapi.nets.faceExpressionNet.loadFromUri("../../models");
		await faceapi.nets.ageGenderNet.loadFromUri("../../models");
		await faceapi.nets.ssdMobilenetv1.loadFromUri("../../models");
		console.log("All models loaded successfully.");
	} catch (error) {
		console.error("Error loading models:", error);
	}
}

/**
 * Process the reference image
 * @returns {void}
 */
async function processReferenceImage() {
	try {
		if (!refImg.complete || refImg.naturalWidth === 0) {
			console.error("Reference image is not loaded yet.");
			return;
		}

		const result = await faceapi
			.detectSingleFace(refImg, new faceapi.TinyFaceDetectorOptions())
			.withFaceLandmarks()
			.withFaceDescriptor();

		if (!result) {
			console.error("No face detected in the reference image.");
			return;
		}

		console.log("Reference image processed successfully:", result);
		referenceDescriptor = result.descriptor;

		// Create FaceMatcher
		faceMatcher = new faceapi.FaceMatcher([
			{ descriptor: referenceDescriptor, label: "Reference Person" },
		]);
		console.log("FaceMatcher created successfully.");
	} catch (error) {
		console.error("Error processing the reference image:", error);
	}
}

// Start the video stream
function startVideo() {
	navigator.mediaDevices
		.getUserMedia({ video: true })
		.then((stream) => {
			video.srcObject = stream;
			video.play();
		})
		.catch((err) => console.error("Error accessing the camera:", err));
}

/**
 * Compare the live video with the reference image
 * @returns {void}
 */
async function compareLiveWithReference() {
	if (!faceMatcher || !referenceDescriptor) {
		console.error("FaceMatcher or reference descriptor is not initialized.");
		return;
	}

	// Delay the detection and comparison
	setTimeout(async () => {
		const detection = await faceapi
			.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
			.withFaceLandmarks()
			.withFaceDescriptor()
			.withFaceExpressions()
			.withAgeAndGender();

		// Check if a face is detected
		if (!detection) {
			alert("No face detected in the video.");
			return;
		}

		// Compare the detected face with the reference descriptor
		const bestMatch = faceMatcher.findBestMatch(detection.descriptor);
		console.log("Comparison result:", bestMatch.toString());

		// Alert if there is a match or not based on the distance threshold
		if (bestMatch.distance <= 0.6) {
			const userId = document.getElementById("userId").value;
			window.location.href =
				"http://localhost/AgriGO/project/app/Middleware/face-signIn.php?id=" +
				userId;
			alert(`Matched with ref img. Confidence: ${bestMatch.distance}`);
		} else alert("No match found.");
	}, 1000); // Wait for 1 second before detection (adjust as needed)
}

/**
 * Detect user smiling
 * @returns
 */
async function is_smile() {
	const { speak } = await import("./text-to-speech.js");
	// Return a promise that resolves after the timeout
	console.log("Smile detection in progress...");
	guide.textContent = "Smile detection in progress...";
	speak("Smile please."); // TTS func
	return new Promise((resolve, reject) => {
		setTimeout(async () => {
			const detection = await faceapi
				.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
				.withFaceLandmarks()
				.withFaceDescriptor()
				.withFaceExpressions()
				.withAgeAndGender();

			// Check if a face is detected
			if (!detection) {
				alert("No face detected in the video.");
				reject("No face detected"); // Reject the promise with an error message
				return;
			}

			// Detect smile based on happiness expression score (Consider smiling if happiness score > 0.5)
			const smileDetected = detection.expressions.happy > 0.5;
			resolve(smileDetected); // Resolve with the result of smile detection
		}, 5000); // Delay the detection by 5s
	});
}

/**
 * Detect user mouth opened
 * @returns
 */
async function is_surprised() {
	const { speak } = await import("./text-to-speech.js");
	// Return a promise that resolves after the timeout
	console.log("Mouth detection in progress...");
	guide.textContent = "Mouth detection in progress...";
	speak("Open your mouth please."); // TTS func
	return new Promise((resolve, reject) => {
		setTimeout(async () => {
			const detection = await faceapi
				.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
				.withFaceLandmarks()
				.withFaceDescriptor()
				.withFaceExpressions()
				.withAgeAndGender();

			// Check if a face is detected
			if (!detection) {
				alert("No face detected in the video.");
				reject("No face detected"); // Reject the promise with an error message
				return;
			}

			// Detect mouth based on surprised expression score (Consider mouth opened if surprised score > 0.5)
			const mouthDetected = detection.expressions.surprised > 0.5;
			resolve(mouthDetected); // Resolve with the result of mouth detection
		}, 5000); // Delay the detection by 5s
	});
}

/**
 * Detect user-head turning to left
 * @returns {Promise}
 */
async function is_headLeft() {
	const { speak } = await import("./text-to-speech.js");
	// Return a promise that resolves after the timeout
	console.log("headLeft detection in progress...");
	guide.textContent = "headLeft detection in progress...";
	speak("Turn your face left."); // TTS func
	return new Promise((resolve, reject) => {
		setTimeout(async () => {
			const detection = await faceapi
				.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
				.withFaceLandmarks()
				.withFaceDescriptor()
				.withFaceExpressions()
				.withAgeAndGender();

			// Check if a face is detected
			if (!detection) {
				alert("No face detected in the video.");
				reject("No face detected"); // Reject the promise with an error message
				return;
			}

			const headLeft =
				detection.landmarks.getNose()[0].x > video.videoWidth * 0.6; // Head turned left
			resolve(headLeft); // Resolve with the result of head detection
		}, 5000); // Delay the detection by 5s
	});
}

/**
 * Detect user-head turning to right
 * @returns {Promise}
 */
async function is_headRight() {
	const { speak } = await import("./text-to-speech.js");
	// Return a promise that resolves after the timeout
	console.log("headRight detection in progress...");
	guide.textContent = "headRight detection in progress...";
	speak("Turn your face right."); // TTS func
	return new Promise((resolve, reject) => {
		setTimeout(async () => {
			const detection = await faceapi
				.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
				.withFaceLandmarks()
				.withFaceDescriptor()
				.withFaceExpressions()
				.withAgeAndGender();

			// Check if a face is detected
			if (!detection) {
				alert("No face detected in the video!");
				reject("No face detected"); // Reject the promise with an error message
				return;
			}

			const headRight =
				detection.landmarks.getNose()[0].x < video.videoWidth * 0.4; // Head turned right
			resolve(headRight); // Resolve with the result of head detection
		}, 5000); // Delay the detection by 5s
	});
}
