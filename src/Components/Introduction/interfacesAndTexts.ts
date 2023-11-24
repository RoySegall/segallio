export interface ActionProps {
    emoji: string,
    text: string,
    handler: (addItemHandler: (item: ChatItem) => void) => void,
}

export interface ChatItem {
    type: 'message' | 'actions',
    message?: string
}

export const messages = [
    'Hello, my name is Roy Segall',
    "I'm a software developer from israel",
    "I'm married and own two cats: Sam and freddy",
    "I'm working in Tricentis israel as a full stack developer",
    "I used to contribute to open source projects and gave session at meetups but I'm not doing it anymore as I'm focusing on my family and my work",
];

export const actions: ActionProps[] = [
    {
        emoji: "👨‍💻",
        text: "Can I hire you?",
        handler: (addItemHandler) => {
            addItemHandler({type: 'message', message: 'Give me pizza'});
        },
    },
    {
        emoji: "⚒️",
        text: "What is your stack?",
        handler: (addItemHandler) => {}
    },
    {
        emoji: "📖",
        text: "What's your story?",
        handler: (addItemHandler) => {}
    },
    {
        emoji: "📰",
        text: "What did you blog about?",
        handler: (addItemHandler) => {}
    },
    {
        emoji: "📲",
        text: "Where can catch-up with you?",
        handler: (addItemHandler) => {}
    },
];

