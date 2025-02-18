const scriptURL = 'https://script.google.com/macros/s/AKfycbxCZvJn674Z-yD7qVhqSKhg3ibRgTCUXPTyniLgERGhNzV--dCCFBCdlXbcfTsvQ_RIjA/exec'; // Replace with your Google Apps Script URL
        const form = document.getElementById('google-sheet-form');
        Logger.log(params);


        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            fetch(scriptURL, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                alert('Form submitted successfully!');
                form.reset();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to submit the form.');
            });
        });

 



















