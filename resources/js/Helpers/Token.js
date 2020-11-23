class Token{

	isValid(token){
		const payload = this.payload(token);
		if (payload) {
			return payload.iss == "/api/auth/login" || "/api/auth/singup" ? true : false
		}
		return false
	}

	payload(token){
		const payload = token.split('.')[1]
		return this.decode(payload)
	}

	decode(payload){
		return JSON.parse(atob(payload))
	}

}
export default Token = new Token();