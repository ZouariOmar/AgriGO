
    function generatePDF() {
        // Collect data from the form
        const user_id = document.getElementById("user_id").value;
        const article_id = document.getElementById("article_id").value;
        const shippingAddress = document.getElementById("shippingAddress").value;
        const paymentMethod = document.getElementById("paymentMethod").value;
        const location = document.getElementById("location").value;
        const date_depart = document.getElementById("date_depart").value;
        const date_arrivee = document.getElementById("date_arrivee").value;
        const email = document.getElementById("email").value;

        // Create a new PDF document
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Add title
        doc.setFontSize(18);
        doc.text("Résumé de la commande", 10, 20);

        // Add the order details to the PDF
        doc.setFontSize(12);
        doc.text(`ID Utilisateur: ${user_id}`, 10, 30);
        doc.text(`ID Article: ${article_id}`, 10, 40);
        doc.text(`Adresse de livraison: ${shippingAddress}`, 10, 50);
        doc.text(`Méthode de paiement: ${paymentMethod}`, 10, 60);
        doc.text(`Lieu de départ: ${location}`, 10, 70);
        doc.text(`Date de départ: ${date_depart}`, 10, 80);
        doc.text(`Date d'arrivée: ${date_arrivee}`, 10, 90);
        doc.text(`Email: ${email}`, 10, 100);

        // Save the PDF
        doc.save("commande.pdf");
    }
