const fetcher = async (api, method = "GET", body = {}) => {
    try {
        let res = method !== "GET" ? await fetch(api, {
            method,
            body
        }) : await fetch(api);
        res = await res.json();
        return res;
    } catch (e) {
        console.log(e)
        return null;
    }
}

export default {
    addFlight: (body) => {
        return fetcher(`/api/flights/create`, "POST", body);
    },
    updateFlight: (id, body) => {
        return fetcher(`/api/flights/${id}`, "PUT", JSON.stringify(body));
    },
    deleteFlight: (id, body) => {
        return fetcher(`/api/flights/${id}`, "DELETE", JSON.stringify(body));
    },
    getSingleFlight: (id,csrf_token) => {
        return fetcher(`/api/flights/${id}?csrf_token=${csrf_token}`);
    }
}