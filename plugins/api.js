// Définir l'URL de l'endpoint dans une variable globale
const url = 'https://api.football-data.org/v4/';

export default defineNuxtPlugin(() => {});

// Fonction pour appeler l'API
export async function callApi(endpoint) {
    try {
        const response = await fetch('http://footsite.maellaroque.fr/api.php?uri=' + url + endpoint);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error(error);
    }
}


