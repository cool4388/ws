customElements.define('x-frame-bypass', class extends HTMLIFrameElement {
    static get observedAttributes() {
        return ['src'];
    }
    constructor() {
        super();
    }
    attributeChangedCallback() {
        this.load(this.src);
    }
    connectedCallback() {
        this.sandbox = this.sandbox || 'allow-forms allow-modals allow-pointer-lock allow-popups allow-same-origin allow-scripts';
    }
    load(url, options) {
        if (!url.startsWith('http')) {
            throw new Error(`X-Frame-Bypass src ${url} must start with http/https`);
        }
        fetch(url)
            .then(response => response.text())
            .then(data => {
                this.srcdoc = data;
            })
            .catch(error => console.error('Error loading frame:', error));
    }
}, { extends: 'iframe' });
