<template>
    <div class="container">
        <Sidebar @competition-selected="fetchCompetitionTeams" />
        <div class="main-content">
            <h1>Bienvenue sur Foot-Site</h1>
            <p v-if="teams.length === 0">Cliquez sur un championnat pour afficher les équipes...</p>
            <TeamsList v-else :teams="teams" />
        </div>
    </div>
</template>

<style>
html, body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #ffffff;
}

.container {
    display: flex;
    flex-direction: row;
    height: 100vh;
}

.main-content {
    height: 80vh;
    flex: 1;
    padding: 20px;
    margin: 30px;
}
</style>

<script>
import Sidebar from '~/components/sidebar.vue';
import TeamsList from '~/components/TeamsList.vue';
import { callApi } from '~/plugins/api';



export default {
    components: {
        Sidebar
    },
    data() {
        return {
            teams: []
        }
    },
    methods: {
        async fetchCompetitionTeams(competitionId) {
            // Utilisez l'ID du championnat sélectionné pour charger les équipes correspondantes
            const result = await callApi(`competitions/${competitionId}/teams`);
            this.teams = result.teams;
            // Tri des équipes par nom
            this.teams.sort((a, b) => a.name.localeCompare(b.name));
            console.log(result);
        }
    },

}
</script>

