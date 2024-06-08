let form = document.getElementById('lobby__form')

let displayName = sessionStorage.getItem('display_name')
if(displayName){
    form.name.value = displayName
}

form.addEventListener('submit', (e) => {
    e.preventDefault()

    sessionStorage.setItem('display_name', e.target.name.value)

    let inviteCode = e.target.room.value
    if(!inviteCode){
        inviteCode = String(Math.floor(Math.random() * 10000))
    }
	sessionStorage.setItem('roomid', inviteCode)
	let roomid ={
		"id": inviteCode
	}
	fetch("roominfo.php", {
		"method": "POST",
		"headers": {
			"Content-Type": "application/json; charset=utf-8"
		},
		"body": JSON.stringify(roomid)
	}).then(function(response){
		return response.text();
	}).then(function(data){
		console.log(data);
	})
	
    window.location = `room.php?room=${inviteCode}`
})