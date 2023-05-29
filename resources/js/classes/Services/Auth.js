export default class Auth {
    /**
     * access for sanctum authorization by actual cookies
     */
    static async getAuthToken() {
        await axios.get('/sanctum/csrf-cookie');
    }

    /**
     * register user
     * @param {name: String, email: String, password: String, password_confirmation: String} user
     */
    static async register(user) {
        this.getAuthToken();

        return new Promise((resolve, reject) => {
            axios.post(`${API}/api/register`, user)
                .then(async response => {
                    await this.login();
                }).catch((message) => {
                    reject(data.message)
                }).finally(() => {
                    resolve()
                })


        });
    }
}
