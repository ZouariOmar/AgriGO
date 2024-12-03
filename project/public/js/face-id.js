/**
 * ? Detecting 68 Face Landmark Points
 * @format
 */

// Video component
const video = document.getElementById("video");

/**
 * @brief Get user video permission
 */
function startVideo() {
	navigator.mediaDevices
		.getUserMedia({ video: true }) // Request video access
		.then((stream) => {
			video.srcObject = stream; // Set the video stream as the source
			video.play(); // Start playing the video
		})
		.catch((err) => {
			console.error("Error accessing the camera:", err);
		});
}

// Load models and start the video/stream
Promise.all([
	faceapi.nets.tinyFaceDetector.loadFromUri("../../models"),
	faceapi.nets.faceLandmark68Net.loadFromUri("../../models"),
	faceapi.nets.faceRecognitionNet.loadFromUri("../../models"),
	faceapi.nets.faceExpressionNet.loadFromUri("../../models"),
	faceapi.nets.ageGenderNet.loadFromUri("../../models"),
	faceapi.nets.faceDescriptorsNet.loadFromUri("../../models"),
]).then(startVideo);

// Wait for the video (wait to load models) to start  playing before creating the canvas
video.addEventListener("loadeddata", () => {
	const canvas = faceapi.createCanvasFromMedia(video);
	document.body.append(canvas);

	// Ensure canvas matches video dimensions (! need to fix)
	const displaySize = { width: video.videoWidth, height: video.videoHeight };
	faceapi.matchDimensions(canvas, displaySize);

	// Start face detection using 'FaceLandmarks' and 'FaceExpressions'
	setInterval(async () => {
		//* Store the detected data
		const detections = await faceapi
			.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
			.withFaceLandmarks()
			.withFaceExpressions()
			.withAgeAndGender();
		// .withFaceDescriptors();

		// Resize detections to match video dimensions
		const resizedDetections = faceapi.resizeResults(detections, displaySize);

		// Clear the canvas and draw updated detections (Refresh action)
		const ctx = canvas.getContext("2d");
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		faceapi.draw.drawDetections(canvas, resizedDetections);
		faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
		faceapi.draw.drawFaceExpressions(canvas, resizedDetections);
		resizedDetections.forEach((detection) => {
			const box = detection.detection.box;
			const drawBox = new faceapi.draw.DrawBox(box, {
				label: Math.round(detection.age) + " year old " + detection.gender,
			});
			drawBox.draw(canvas);
		});
	}, 100);
});
