<template>
    <div class="teams">
        <div class="team-column">
            <ul class="teams-list">
                <li class="team" v-for="team in evenTeams" :key="team.id">
                    <img class="team-logo" :src="team.crest" :alt="team.name">
                    <span class="team-name">{{ team.name }}</span>
                </li>
            </ul>
        </div>
        <div class="team-column">
            <ul class="teams-list">
                <li class="team" v-for="team in oddTeams" :key="team.id">
                    <img class="team-logo" :src="team.crest" :alt="team.name">
                    <span class="team-name">{{ team.name }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>
  
<script>
export default {
    props: {
        teams: Array,
    },
    computed: {
        evenTeams() {
            if (!this.teams) return []; // Vérifiez que teams est défini
            // Filtrer les équipes avec des indices pairs
            return this.teams.filter((team, index) => index % 2 === 0);
        },
        oddTeams() {
            if (!this.teams) return []; // Vérifiez que teams est défini
            // Filtrer les équipes avec des indices impairs
            return this.teams.filter((team, index) => index % 2 === 1);
        },
    },
};
</script>
  
<style scoped>
/* Styles spécifiques à cette liste d'équipes, en utilisant scoped pour éviter les conflits */
.teams {
    display: flex;
    justify-content: space-between;
}

.team-column {
    flex: 1;
}

.teams-list {
    list-style: none;
    padding: 0;
}

.team {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    display: flex;
    align-items: center;
}

.team-logo {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}

.team-name {
    font-weight: bold;
}
</style>
  