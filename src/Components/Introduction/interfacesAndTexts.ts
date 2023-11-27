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

// actions:
// 2. what is you stack?
//    I'm a full stack developer, I can do everything. In my last(current) job I did some ux ui issues I think i'm not just full stack developer.
//    but what is the tech?
//    I used to work with Drupal for a lot of time (you can read in the job sections, link). I worked with python in Dreamed (link to job and mark dreamed) and now I'm doing react, node, a bit of appium.
// 3. I want to see you story in the industry (link to jobs)
// 4. I want to read your blog posts (link to blog posts)
// 5. Where can I catch you?

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
            addItemHandler({type: 'message', message: "Currently I'm working with react, node and a bit of appium"})
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

