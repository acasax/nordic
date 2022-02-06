$(document).ready(function(){
    const $contactForm = $('#contactForm')
    let validator = void(0)

    if($contactForm.length) {
        validator = $contactForm.validate({
            rules: {
                name: {
                    required: true,
                },
                message: {
                    required: true,
                },
                subject: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                name: {
                    required: "Unesite ime"
                },
                message: {
                    required: "Unesite prezime"
                },
                email: {
                    required: "Unesite email adresu",
                    email: "E adresa koju se uneli nije validna."
                },
                subject: {
                    required: "Izaberite firmu"
                },
            }
        })
        $.validator.methods.phoneRegex = function( value, element ) {
            return this.optional( element ) || /^[(]?[0-9]{3}[)]?[-\s\/]?[0-9]{3}[-]?[0-9]{3,4}$/.test( value );
        }
    }

    PHONE_NUMBER_INPUT = function (e) {
        let value = e.value
        if(!value) return;
        const globalRegex = RegExp('^[(]?[0-9]{3}[)]?[-\\s\\/]?[0-9]{3}[-]?[0-9]{3,4}$', 'g');
        console.log(globalRegex.test(value))
        if(!globalRegex.test(value)) {
            return
        }
        $(e).valid()
    }

});