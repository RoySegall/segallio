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
    "You can ping me up at Linkedin, facebook, twitter or github",
];

export const Introduction = () => {
    const [messages, setMessages] = useState<string[]>([]);
    const [collapseIntroduction, setCollapseIntroduction] = useState<boolean>(false);

    useEffect(() => {
        (async () => {
            for (let i = 0; i < myMessages.length; i++) {
                setMessages(messages => [...messages, myMessages[i]]);
                await sleep(2);
            }

            setCollapseIntroduction(true);
        })();
    }, []);

    return <div className={`${styles.introductionSection} ${collapseIntroduction && styles.collapseSection}`}>
        <div className={styles.introductionWrapper}>
            <div className={styles.top}>
                <div className={styles.photo}><Image src={picture} width="75" height="75" alt={'Personal picture'} /></div>
                <div className={styles.texts}>
                    <span className={`${styles.name} ${robotoMono.className}`}>Roy Segall</span>
                </div>
            </div>

            <div className={styles.introduction}>
                <div className={styles.messages}>
                    {messages.map((message, key) => <Message message={message} key={key} />)}
                </div>

                <div className={styles.inputWrapper}>
                    <input placeholder='Say something nice :)' />
                </div>
            </div>
        </div>
    </div>
}
