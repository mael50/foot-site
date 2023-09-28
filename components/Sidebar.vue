<template>
    <div class="sidebar">
        <ul id="all-competitions" class="competitions-list">
            <li v-for="result in results.competitions" :key="result.id" :class="{'competition': true, 'disabled': result.name === 'European Championship'}" @click="result.name !== 'European Championship' && selectCompetitions(result.id)">
                <img :src="result.emblem" class="competition-flag">
                {{ result.name }}
            </li>
        </ul>
    </div>
</template>

<style>
.sidebar {
    display: flex;
    align-items: center;
    margin-left: 30px;
    height: 80vh;
    padding : 20px;
    margin-top: auto;
    margin-bottom: auto;
    border-radius: 30px;
    background-color: #d5d3d533;
    box-shadow: 0 0 10px #ccc;
}

.main-content {
    flex: 1;
}

.competitions-list {
    list-style: none;
    padding: 0;
    height: 100%;
}

.competition {
    display: flex;
    align-items: center;
    padding: 10px;
    cursor: pointer;
    height: 4.7%;
}

.competition:hover {
    background-color: #ccc;
    border-radius: 10px;
}

.competition-flag {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}

.disabled {
    color: #6d6c6c;
    cursor: not-allowed;
}
</style>

<script>
import { callApi } from '~/plugins/api';

export default {
    data() {
        return {
            endpoint: 'competitions',
            results: []
        }
    },
    methods: {
        async fetchData() {
            const result = await callApi(this.endpoint);
            this.results = result;
            this.results.competitions.sort((a, b) => a.name.localeCompare(b.name));
            console.log(result);

        },
        async selectCompetitions(id) {
            this.$emit('competition-selected', id);
        }
    },
    async mounted() {
        await this.fetchData();
    }
}

</script>