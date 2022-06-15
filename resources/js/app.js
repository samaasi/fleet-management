import Alpine from 'alpinejs';
import Tooltip from '@ryangjchandler/alpine-tooltip';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';

Alpine.plugin(Tooltip);
Alpine.plugin(FormsAlpinePlugin);

window.Alpine = Alpine;
Alpine.start();
