import { defineStore } from 'pinia';

export const useCounterStore = defineStore('counter', {
  state: () => ({
    counter: 0,
    isLogin: !!localStorage.getItem('token'),
    token: '',
  }),
  getters: {
    doubleCount: (state) => state.counter * 2,
  },
  actions: {
    increment() {
      this.counter++;
    },
  },
});
