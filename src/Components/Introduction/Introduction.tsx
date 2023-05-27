import Image from 'next/image';
import picture from './pictures/first.jpg';
import styles from './introduction.module.scss';
import {robotoMono} from "@/common/fonts";

const messages = [
    'Hello, my name is Roy Segall',
    "I'm a software developer from israel",
    "I'm married and own two cats: Sam and freddy",
    "I'm working in Tricentis israel as a full stack developer",
    "I used to contribute to open source projects and gave session at meetups but I'm not doing it anymore as I'm focusing on my family and my work",
    "You can ping me up at Linkedin, facebook, twitter or github",
];


export const Introduction = () => <div className={styles.introduction}>
    <div>
        <Image src={picture} fill={true} alt={'Personal picture'} />
    </div>
    <div className={styles.messages}>
        {messages.map((message, key) => <p key={key} className={`${styles.message} ${robotoMono.className}`}>{message}</p>)}
    </div>
</div>
