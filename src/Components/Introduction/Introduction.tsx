'use client';
import styles from './introduction.module.scss';
import {useState, useEffect} from "react";
import {Message} from "@/Components/Introduction/Message";
import {sleep} from "@/common/uitls";
import Image from 'next/image';
import picture from './pictures/avatar.jpg'
import {robotoMono} from "@/common/fonts";

const myMessages = [
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

const Actions = () => {
    return <>asdasdasd</>
};

export const Introduction = () => {
    const [messages, setMessages] = useState<string[]>([myMessages[0]]);
    const [collapseIntroduction, setCollapseIntroduction] = useState(false);
    const [showActions, setShowActions] = useState(true);

    // useEffect(() => {
    //     (async () => {
    //         for (let i = 0; i < myMessages.length; i++) {
    //             setMessages(messages => [...messages, myMessages[i]]);
    //             await sleep(2);
    //         }
    //
    //         setCollapseIntroduction(true);
    //     })();
    // }, []);

    return <div className={`${styles.introductionSection} ${collapseIntroduction && styles.collapseSection}`}>
        <div className={`${styles.introductionWrapper} ${collapseIntroduction && styles.collapseSection}`}>
            <div className={styles.top}>
                <div className={styles.photo}><Image src={picture} width="75" height="75" alt={'Personal picture'} /></div>
                <div className={styles.texts}>
                    <span className={`${styles.name} ${robotoMono.className}`}>Roy Segall</span>
                </div>
            </div>

            <div className={`${styles.introduction} ${collapseIntroduction && styles.collapseSection}`}>
                <div className={styles.messages}>
                    {messages.map((message, key) => <Message message={message} key={key} />)}
                </div>

                {showActions && <Actions />}

                <div  className={`${styles.inputWrapper} ${collapseIntroduction && styles.collapseSection}`}>
                    <input placeholder='Say something nice :)' />
                </div>
            </div>
        </div>
    </div>
}
