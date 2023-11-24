import {sleep} from "@/common/uitls";

export interface Action {
    emoji: string,
    text: string,
    handler: (addItemHandler: (item: ChatItem) => void) => void,
}

export interface ActionsProps {
    addItemHandler: (item: ChatItem) => void,
    actions: Action[]
}

type MessageItem = {type: 'message', message: string};
type ActionsItem = {type: 'actions', actions: Action[]};
export type ChatItem = MessageItem | ActionsItem;

export const messages = [
    'Hello, my name is Roy Segall',
    "I'm a software developer from israel",
    "I'm married and own two cats: Sam and freddy",
    "I'm working in Tricentis israel as a full stack developer",
    "I used to contribute to open source projects and gave session at meetups but I'm not doing it anymore as I'm focusing on my family and my work",
];

// actions:
// 1. are you free for hire?
//    no :)
//    Are you sure?
//    yes
//    Really really sure?
//    yes... but you can try again in a the future. Maybe soemthing will change.
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
        text: "Can I hire you?",
        handler: async (addItemHandler) => {
            addItemHandler({type: 'message', message: "I'm not looking for a new job right now"});
            addItemHandler({type: 'actions', actions: [
                    {emoji: "🍕", text: "Pizza", handler: () => {}},
            ]});
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

