import '@siemens/ix-icons/dist/css/ix-icons.css';
import '@siemens/ix/dist/siemens-ix/siemens-ix.css';
import { applyPolyfills, defineCustomElements } from '@siemens/ix/loader';









(async () => {
    await applyPolyfills();
    await defineCustomElements();
})();

