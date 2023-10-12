<script setup>
const { team, classement } = defineProps([
    'team',
    'classement'
]);

let adresse = '';
if (!('venue' in team)) {
    venue = '';
}



const teamClassement = classement.standings[0].table.find(teamClassement => teamClassement.team.id === team.id);
let expo = '';
if (teamClassement.position === 1) {
    expo = '🏆 1er';
} else if (teamClassement.position === 2) {
    expo = '🥈 2ème';
} else if (teamClassement.position === 3) {
    expo = '🥉 3ème';
} else {
    expo = teamClassement.position + 'ème';
}


</script>

<template>
    <div class="team-stats">
        <div class="team-logo-name">
            <img :src="team.crest" :alt="team.name" />
            <h2>{{ team.name }}</h2>
        </div>
        <div v-for="competitions in team.runningCompetitions" :key="competitions.id">
            <div v-if="competitions.type == 'LEAGUE'" class="stats">
                <div class="stat">
                    <div class="stat__value">{{ expo }} de {{ competitions.name }}</div>
                    <img :src="competitions.emblem" :alt="competitions.name" />
                </div>
            </div>
            <div v-else-if="competitions.type == 'CUP'" class="stats">
                <div class="stat">
                    <div class="stat__value">{{ competitions.name }}</div>
                    <img :src="competitions.emblem" :alt="competitions.name" />
                </div>
            </div>
        </div>

        <div v-if="team.venue" class="location">
            <div class="location__stadium">{{ venue }}</div>
            <div class="location__address">{{ adresse }}</div>
        </div>



    </div>
</template>

<style scoped>
.team-stats {
    margin-bottom: 20px;
}

.team-logo-name {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.team-logo-name img {
    width: 150px;
    margin-right: 10px;
}

.team-stats h2 {
    font-size: 5rem;
}

.stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
}

.stat {
    display: flex;
    align-items: center;
    justify-content: left;
    flex: 2
}

.stat .stat__value {
    margin-left: 10px;
    font-weight: bold;
    font-size: 1.5rem;
}

.stat img {
    width: 50px;
    margin-left: 10px;
}

.location {
    align-items: center;
    justify-content: left;
    flex: 2
}

.location__stadium {
    margin-left: 10px;
    font-weight: bold;
    font-size: 1.5rem;
}

.location__address {
    margin-left: 10px;
    font-weight: bold;
    font-size: 1.5rem;
}


</style>