require('./bootstrap');

import Alpine from 'alpinejs'
import moment from 'moment'
import VanillaCalendar from '@uvarov.frontend/vanilla-calendar';
import flatpickr from 'flatpickr';

moment.locale('nl', {
    calendar: {
        sameDay: '[Vandaag]',
        nextDay: '[Morgen]',
        nextWeek: 'dddd',
        lastDay: '[Gisteren]',
        lastWeek: '[Afgelopen] dddd',
        sameElse: 'DD/MM/YYYY'
    },
    weekdays: [ "Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag" ]
});

window.Alpine = Alpine;
window.moment = moment;
window.VanillaCalendar = VanillaCalendar;
window.flatpickr = flatpickr;

Alpine.start();
