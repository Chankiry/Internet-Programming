import { defineStore  } from 'pinia'

import image1 from '../assets/Logo.png';


export const useLogo = defineStore('Logo', {
    state: () => ({
      Logo: [
        {
            image: image1,
        }
      ]
    })
})