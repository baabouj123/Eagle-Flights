import api from "./api.js";

window.addEventListener("DOMContentLoaded",()=>{
    document.querySelector('#add-flight-form')?.addEventListener("submit",async evt => {
        evt.preventDefault();
        const res = await api.addFlight(new FormData(evt.target));
        console.log(res);
            if (res.success) {
                window.location.reload();
            } else {
                for (const [field] of Object.entries(res.errors)) {
                    document.querySelector(`#add-flight-form #${field}`).classList.add("border-red-600");
                    document.querySelector(`#add-flight-form #${field}-error`).textContent = "Field is required";
                }
            }
    })
})