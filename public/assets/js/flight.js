import api from "./api.js";

window.addEventListener("DOMContentLoaded", () => {
    let id;

    document.querySelector("#edit-flight-form").addEventListener("submit", async evt => {
        evt.preventDefault();
        // alert(id);
        const formData = new FormData(evt.target);
        const id = evt.target[1].value;
        console.log(formData.get("depart_city"))
        return;
        const res = await api.updateFlight(id, {
            csrf_token
        });
        console.log(res);
        if (res.success) {
            document.querySelector("#edit-flight-modal").classList.remove("hidden");
            // window.location.reload();
        }
    });

    document.querySelectorAll("#edit-flight-btn").forEach(btn => {
        btn.addEventListener("click", async () => {
            id = btn.value;
            const {flight} = await api.getSingleFlight(id, document.querySelector("#csrf_token").value);
            document.querySelector("#edit-flight-modal").classList.remove("hidden");
            document.querySelectorAll("#edit-flight-form input").forEach(input => {
                input.value = flight[input.id];
                console.log(input);
            })
        })
    });
    document.querySelector("#close-modal")?.addEventListener("click", () => {
        document.querySelector("#edit-flight-modal").classList.add("hidden")
    })
    document.querySelectorAll("#delete-flight-form").forEach(form => {
        form.addEventListener("submit", async evt => {
            evt.preventDefault();
            const csrf_token = evt.target[0].value;
            const id = evt.target[1].value;
            const res = await api.deleteFlight(id, {
                csrf_token
            });
            if (res.success) {
                window.location.reload();
            }
        })
    });
})