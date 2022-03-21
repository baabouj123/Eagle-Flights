tailwind.config = {
    theme:
        {
            extend:
                {
                    colors:
                        {
                            primary: '#02C39A',
                            secondary: '#27272A',
                            surface: '#FAFAFA',
                        },
                    keyframes: {
                        slide: {
                            '0%': {
                                transform: 'translateY(-100px)'
                            },
                            '100%': {
                                transform: 'translateY(0)'
                            },
                        },
                    },
                    animation: {
                        slide: 'slide 0.5s ease-out',
                    }
                },
            fontFamily: {
                "poppins" : ['Poppins'],
                "josefin-sans" : ['Josefin Sans'],
                "chakra-petch" : ['Chakra Petch']
            }
        }
}