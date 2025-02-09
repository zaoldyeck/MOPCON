export const state = () => ({
  homePageReady: false,
  eventResults: [
    {
      id: 'captain-america',
      title: '歹丸隊長',
      subtitle: '即使變老人，仍然持續',
      desc:
        '隨著時間的累積，能力持續提升。如果你同時運用一己之力幫助身旁的人，世界會因你更美好！',
      image: 'captain-america.png',
    },
    {
      id: 'iron-man',
      title: '肝鐵人',
      subtitle: '加班加過頭',
      desc:
        '你無法忍受失敗，讓你最近身心疲乏，放鬆心情看待一切，接下來你的表現會很棒的！',
      image: 'iron-man.png',
    },
    {
      id: 'hulk',
      title: '綠句人耗克',
      subtitle: '事業順利，感情不順',
      desc:
        '你的事業逐漸步入軌道！但你和曖昧對象的感情似乎沒有結果了，看來「英雄的路上是孤獨的」.....',
      image: 'hulk.png',
    },
    {
      id: 'black-widow',
      title: '黑寡腹',
      subtitle: '為愛犧牲一切',
      desc:
        '你願意犧牲自己換取身旁的一切順心。即使現在你的處境看似不如意，但馬上就有好事發生囉！',
      image: 'black-widow.png',
    },
  ],
  sessionData: [],
});

export const mutations = {
  updateHomePageReady(state, payload) {
    state.homePageReady = payload;
  },
  setSessionData(state, payload) {
    if (Array.isArray(payload)) {
      state.sessionData = payload;
    }
  },
};

export const actions = {
  async getSessionData({ commit }) {
    try {
      const { data } = await this.$axios.get('/api/2019/session');
      console.log('res', data);

      if (data.data && data.data.length > 0) {
        commit('setSessionData', data.data);
      }
    } catch (err) {
      console.log('err', err);
    }
  },
};

export const getters = {
  homePageReady: state => state.homePageReady,
  eventResults: state => state.eventResults,
  sessionData: state => state.sessionData,
};
