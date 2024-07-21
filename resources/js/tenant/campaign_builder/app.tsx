// @ts-ignore
import ReactDOM from 'react-dom/client';
import CampaignBuilder from "./Components/CampaignBuilder";

const rootElement = document.getElementById('root');

if (!rootElement) {
    console.error('Root element not found');
} else {
    // @ts-ignore
    const nonce = document.querySelector('meta[property="csp-nonce"]').content;
    ReactDOM.createRoot(rootElement).render(
        <CampaignBuilder/>
    );
}


