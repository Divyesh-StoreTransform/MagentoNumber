var config = {
    paths: {
        "intlTelInput": 'Storetransform_Number/js/intlTelInput',
        "intlTelInputUtils": 'Storetransform_Number/js/utils',
        "internationalTelephoneInput": 'Storetransform_Number/js/internationalTelephoneInput'
    },

    shim: {
        'intlTelInput': {
            'deps':['jquery', 'knockout']
        },
        'internationalTelephoneInput': {
            'deps':['jquery', 'intlTelInput']
        }
    }
};