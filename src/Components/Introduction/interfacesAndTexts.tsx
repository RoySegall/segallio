import {sleep} from "@/common/uitls";
import ReactChild from "react";

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

type MessageItem = {type: 'message', message: string | ReactChild.JSX.Element};
export type ActionsItem = {type: 'actions', actions: Action[]};
export type ChatItem = MessageItem | ActionsItem;

export const messages = [
    'Hello, my name is Roy Segall',
    "I'm a software engineer from Israel",
    "I'm married to my lovely wife Noy and own two cats: Sam and freddy",
    "I'm working in Tricentis Israel as a full stack developer",
    "I love food and especially cooking",
];

const workEmail = 'r.segall@tricentis.com';

const catchUp: Action = {
    emoji: "📲",
    text: "Where can I catch-up with you?",
    handler: async (addItemHandler) => {
        addItemHandler({type: 'message', message: "You can send me an email to roy@segall.io"});
        if (workEmail) {
            await sleep(1.75);
            addItemHandler({type: 'message', message: "But if it's related to work you can send email to r.segall@tricentis.com"});
        }
        await sleep(1.75);
        addItemHandler({type: 'message', message: <>You can visit my LinkedIn profile <a href="https://www.linkedin.com/in/roysegall/">here</a></>});
    }
};

export const actions: Action[] = [
    {
        emoji: "👨‍💻",
        text: "Are you looking for a job?",
        handler: async (addItemHandler) => {
            const lookingForJob = true;

            if (!lookingForJob) {
                addItemHandler({type: 'message', message: "I'm not looking for a new job at the moment"});
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
            addItemHandler({type: 'message', message: "I worked with Django in Dreamed Diabeted and in my contribution in the hasadna"})
        }
    },
    {
        emoji: "📖",
        text: "What's your story?",
        handler: async (addItemHandler) => {
            addItemHandler({type: 'message', message: "I'm glad you asked 😃"});
            await sleep(2);
            addItemHandler({type: 'message', message: <>You can go to the <a href="#jobs">jobs</a> section and read about my story</>});
        }
    },
    {
        emoji: "📰",
        text: "What did you blog about?",
        handler: async (addItemHandler) => {
            addItemHandler({type: 'message', message: <>You can read about my blogs in the <a href="#blogs">blogs</a></>});
        }
    },
    catchUp,
];

