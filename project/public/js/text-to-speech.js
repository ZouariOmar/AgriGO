/** @format */

/**
 * TTS function
 * @param {String} text 
 */
export function speak(text) {
	// Create a SpeechSynthesisUtterance
	const utterance = new SpeechSynthesisUtterance(text);

	// Select a voice
	const voices = speechSynthesis.getVoices();
	utterance.voice = voices[15]; // Choose a specific voice

	// Speak the text
	speechSynthesis.speak(utterance);
}
