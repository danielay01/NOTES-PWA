import './bootstrap';

let deferredPrompt = null;

window.addEventListener('beforeinstallprompt', function (e) {
    console.log('beforeinstallprompt fired');
    e.preventDefault();
    deferredPrompt = e;

    const installBtn = document.getElementById('installBtn');

    if (installBtn) {
        installBtn.style.display = 'block';
    }
});

window.addEventListener('DOMContentLoaded', function () {
    const installBtn = document.getElementById('installBtn');

    if (installBtn) {
        installBtn.addEventListener('click', async function () {
            if (!deferredPrompt) {
                alert('Install prompt is not available yet. Refresh the page or check your PWA setup.');
                return;
            }

            deferredPrompt.prompt();

            await deferredPrompt.userChoice;

            deferredPrompt = null;
            installBtn.style.display = 'none';
        });
    }
});

if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('/sw.js');
    });
}