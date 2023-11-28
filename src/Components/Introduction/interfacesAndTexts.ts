import {sleep} from "@/common/uitls";

export interface Action {
    emoji: string,
    text: string,
    handler: (addItemHandler: (item: ChatItem) => void) => void,
    disabled?: boolean,
}

export interface ActionsProps {
    addItemHandler: (item: ChatItem) => void,
    actions: Action[]
}

type MessageItem = {type: 'message', message: string};
export type ActionsItem = {type: 'actions', actions: Action[]};
export type ChatItem = MessageItem | ActionsItem;

export const messages = [
    'Hello, my name is Roy Segall',
    "I'm a software developer from israel",
    "I'm married and own two cats: Sam and freddy",
    "I'm working in Tricentis israel as a full stack developer",
    "I used to contribute to open source projects and gave session at meetups but I'm not doing it anymore as I'm focusing on my family and my work",
];

const catchUp: Action = {
    emoji: "📲",
    text: "Where can catch-up with you?",
    handler: (addItemHandler) => {}
};

export const actions: Action[] = [
    {
        emoji: "👨‍💻",
        text: "Are you looking for a job?",
        handler: async (addItemHandler) => {
            const lookingForJob = false;

            if (!lookingForJob) {
                addItemHandler({type: 'message', message: "I'm not looking for a new job right now"});
            } else {
                addItemHandler({type: 'message', message: "Yes. you can look at the how to catch up"});
                await sleep(2);
                addItemHandler({type: 'actions', actions: [catchUp]});
            }
        },
    },
    {
        emoji: "⚒️",
        text: "What is your stack?",
        handler: async (addItemHandler) => {
            addItemHandler({type: 'message', message: "Currently I'm working with react, node and a bit of appium"});
            await sleep(2);
            addItemHandler({type: 'message', message: "But I used to work with Drupal for a lot of years during my job at gizra"})
            await sleep(2);
            addItemHandler({type: 'message', message: "I worked with Django in Dreamed and in my contribution in the hasadna"})
        }
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
    catchUp,
];

