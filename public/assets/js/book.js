window.addEventListener("DOMContentLoaded", () => {

    document.querySelector('#booking-form').addEventListener("submit", async (e) => {
        e.preventDefault();

        try {
            await fetch("/api/bookings/create", {
                method: "POST",
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify({
                    csrf_token: e.target[0].value,
                    flight_id: e.target[1].value
                })
            });
            location.replace("/bookings")
        } catch (e) {
            console.log(e);
        }
    })
});

