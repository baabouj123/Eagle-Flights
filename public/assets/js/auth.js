window.addEventListener("DOMContentLoaded", () => {

    // Modals
    document.querySelectorAll(".login-btn")?.forEach(child => child.addEventListener("click", () => {
        document.querySelector("#login-modal").classList.remove("hidden");
        document.querySelector("#signup-modal").classList.add("hidden");
    }))
    document.querySelectorAll(".signup-btn")?.forEach(child => child.addEventListener("click", () => {
        document.querySelector("#signup-modal").classList.remove("hidden");
        document.querySelector("#login-modal").classList.add("hidden");
    }))
    document.querySelector("#close-login-modal")?.addEventListener("click", (evt) => {
        document.querySelector("#login-modal").classList.add("hidden");
    })
    document.querySelector("#close-signup-modal")?.addEventListener("click", () => {
        document.querySelector("#signup-modal").classList.add("hidden");
    })

    // Forms
    document.querySelector('#login-form')?.addEventListener('submit', async evt => {
        evt.preventDefault();
        try {
            const formData = new FormData(evt.target);
            let res = await fetch("/api/auth/login", {
                method: "POST",
                body: formData
            });
            res = await res.json();
            if (res.success) {
                window.location.reload();
            } else {
                for (const [field, value] of Object.entries(res.errors)) {
                    document.querySelector(`#login-form #${field}`).classList.add("border-red-600");
                    document.querySelector(`#login-form #${field}-error`).textContent = value;
                }
            }
        } catch (e) {
            console.log(e);
        }
    })

    document.querySelector('#signup-form')?.addEventListener('submit', async evt => {
        evt.preventDefault();
        try {
            const formData = new FormData(evt.target);
            let res = await fetch("/api/auth/signup", {
                method: "POST",
                body: formData
            })
            res = await res.json();
            console.log(res)
            if (res.success) {
                window.location.reload();
            } else {
                for (const [field, value] of Object.entries(res.errors)) {
                    document.querySelector(`#signup-form #${field}`).classList.add("border-red-600");
                    document.querySelector(`#signup-form #${field}-error`).textContent = value;
                }
            }
        } catch (e) {
            console.log(e)
        }
    })

    document.querySelector('#logout-form')?.addEventListener('submit', async evt => {
        evt.preventDefault();
        try {
            const formData = new FormData(evt.target);
            let res = await fetch("/api/auth/logout", {
                method: "POST",
                body: formData
            })
            res = await res.json();
            if (res.success) {
                window.location.reload();
            }
        } catch (e) {
            console.log(e)
        }
    })
})