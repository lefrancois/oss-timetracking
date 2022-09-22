import './bootstrap';

import Alpine from 'alpinejs';
import 'remixicon/fonts/remixicon.css'
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/scale.css';

window.Alpine = Alpine;

Alpine.start();

tippy('[data-tippy-content]', {
    animation: 'scale',
})
