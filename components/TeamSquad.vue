<script setup>
const { squad } = defineProps([
    'squad'
]);
const squadd = squad.squad;
const goalkeepers = squadd.filter(player => player.position === 'Goalkeeper');
const defenders = squadd.filter(player => player.position === 'Defence');
const midfielders = squadd.filter(player => player.position === 'Midfield');
const forwards = squadd.filter(player => player.position === 'Offence');


</script>

<template>
    <div class="team-squad">
        <h2>Coach</h2>
        <div class="coach">
            <div v-if="squad.coach" class="coach__name">{{ squad.coach.name }}</div>
        </div>

        <h2>Joueurs</h2>
        <div class="players">
            <h3>Gardiens</h3>
            <div class="goalkeepers">
                <div v-for="player in goalkeepers" :key="player.id" class="goalkeeper-{{ player.id }}">
                    <div class="player__name">{{ player.name }}</div>
                    <div class="player__age">{{ new Date().getFullYear() - new Date(player.dateOfBirth).getFullYear() }} ans
                    </div>
                    <div class="player__nationality">{{ player.nationality }}</div>
                </div>
            </div>

            <h3>Défenseurs</h3>
            <div class="defenders">
                <div v-for="player in defenders" :key="player.id" class="defender-{{ player.id }}">
                    <div class="player__name">{{ player.name }}</div>
                    <div class="player__age">{{ new Date().getFullYear() - new Date(player.dateOfBirth).getFullYear() }} ans
                    </div>
                    <div class="player__nationality">{{ player.nationality }}</div>
                </div>
            </div>

            <h3>Milieux</h3>
            <div class="midfielders">
                <div v-for="player in midfielders" :key="player.id" class="midfielder-{{ player.id }}">
                    <div class="player__name">{{ player.name }}</div>
                    <div class="player__age">{{ new Date().getFullYear() - new Date(player.dateOfBirth).getFullYear() }} ans
                    </div>
                    <div class="player__nationality">{{ player.nationality }}</div>
                </div>
            </div>

            <h3>Attaquants</h3>
            <div class="forwards">
                <div v-for="player in forwards" :key="player.id" class="forward-{{ player.id }}">
                    <div class="player__name">{{ player.name }}</div>
                    <div class="player__age">{{ new Date().getFullYear() - new Date(player.dateOfBirth).getFullYear() }} ans
                    </div>
                    <div class="player__nationality">{{ player.nationality }}</div>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>
.team-squad {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    max-width: 1200px;
    padding: 0 1rem;
}

.team-squad h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.team-squad h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.team-squad .coach {
    display: flex;
    margin-bottom: 20px;
}

.team-squad .coach__name {
    font-size: 1.5rem;
}

.team-squad .goalkeepers,
.team-squad .defenders,
.team-squad .midfielders,
.team-squad .forwards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 20px;
}

.team-squad .goalkeepers>div,
.team-squad .defenders>div,
.team-squad .midfielders>div,
.team-squad .forwards>div {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    margin: 10px;
    border: 1px solid #292929;
    border-radius: 5px;
}

.team-squad .player__name {
    font-weight: bold;
    flex: 2;
}

.team-squad .player__age {
    flex: 1;
}

.team-squad .player__nationality {
    flex: 1;
    text-align: right;
}
</style>