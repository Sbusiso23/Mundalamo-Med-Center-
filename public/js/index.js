

function viewCard(event)
{
	var service_btn = event.target;

	let service_container = service_btn.parentElement.parentElement;
	let service_front = service_btn.parentElement
	let service_back = service_container.lastElementChild

	service_container.classList.add("flip")

	service_front.style.display = "none"
	service_back.style.display = "flex"
}

function closeCard(event)
{
	var close_btn = event.target;

	let service_container = close_btn.parentElement.parentElement
	let service_front = service_container.firstElementChild
	let service_back = service_container.lastElementChild

	service_container.classList.remove("flip")
	
	service_front.style.display = "flex"
	service_back.style.display = "none"
}