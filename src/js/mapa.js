if (document.querySelector('#mapa')) {

    // var L = window.L;

    const lat = 25.678955;
    const lng = -100.4924288;
    const zoom = 17;

    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="fs-2 fw-bold">Alitas Legendarias</h2> 
        `)
        .openPopup();
}