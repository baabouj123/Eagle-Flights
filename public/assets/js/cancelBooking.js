window.addEventListener("DOMContentLoaded", () => {
    document.querySelector('#cancel-booking-form').addEventListener("submit", async (e) => {
        e.preventDefault();
        try {
            await fetch("/api/bookings/delete", {
                method: "DELETE",
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify({
                    csrf_token: e.target[0].value,
                    id: e.target[1].value
                })
            });
            location.replace("/bookings");
        } catch (e) {
            console.log(e);
        }
    })
});
