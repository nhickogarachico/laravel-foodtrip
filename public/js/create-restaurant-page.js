/** Contact Number Scripts */
const addMobileBtn = document.getElementById('addMobileBtn')
const addTelephoneBtn = document.getElementById('addTelephoneBtn')
const mobileNumbersDiv = document.querySelector('.mobile-numbers-div')
const mobileNumberInput = document.getElementById('floatingMobile1')
const telephoneNumbersDiv = document.querySelector('.telephone-numbers-div')
const telephoneNumberInput = document.getElementById('floatingTelephone1')

const addNewContactNumber = (contactInput, contactNumbersDiv) => {
    const containerDiv = document.createElement('div')
    const contactNumber = document.createElement('p')
    const removeBtn = document.createElement('button')
    const closeIcon = document.createElement('i')
    closeIcon.classList.add('fas', 'fa-times')
    removeBtn.appendChild(closeIcon)
    removeBtn.type = 'button'
    removeBtn.classList.add('btn', 'btn-main-red', 'py-1', 'ms-2')
    removeBtn.addEventListener('click', () => {
        containerDiv.remove(removeBtn)
    })

    if (contactInput.value.length < 10 && contactInput.id === 'floatingMobile1') {
        alert('Invalid mobile number')
        contactInput.value = ""
        contactInput.focus()
    } else if (contactInput.value.length < 9 && contactInput.id === 'floatingTelephone1') {
        alert('Invalid mobile number')
        contactInput.value = ""
        contactInput.focus()
    } else {
        contactNumber.innerText = "(+63) " + contactInput.value
        contactNumber.style.marginBottom = '0'
        contactNumber.style.fontWeight = '600'
        containerDiv.classList.add('d-flex', 'align-items-center', 'justify-content-center', 'mb-2')
        containerDiv.appendChild(contactNumber)
        containerDiv.appendChild(removeBtn)
        contactNumbersDiv.appendChild(containerDiv)
    }

}
addMobileBtn.addEventListener('click', () => addNewContactNumber(mobileNumberInput, mobileNumbersDiv))
addTelephoneBtn.addEventListener('click', () => addNewContactNumber(telephoneNumberInput, telephoneNumbersDiv))

const onlyDigits = (e) => {
    lettersRegex = /^[0-9]*$/
    if (!e.target.value.match(lettersRegex)) {
        e.target.value = ""
    }
}

mobileNumberInput.addEventListener('input', e => onlyDigits(e))
telephoneNumberInput.addEventListener('input', e => onlyDigits(e))