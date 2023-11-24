'use client';
import styles from './introduction.module.scss';
import {useState, useEffect, FC, useReducer, useCallback} from "react";
import {Message} from "@/Components/Introduction/Message";
import {sleep} from "@/common/uitls";
import Image from 'next/image';
import picture from './pictures/avatar.jpg'
import {robotoMono} from "@/common/fonts";
import {actions, ChatItem, messages} from "@/Components/Introduction/interfacesAndTexts";
import type {ActionProps} from "@/Components/Introduction/interfacesAndTexts";


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


const Action: FC<ActionProps> = ({emoji, text }) => {
    const [show, setShow] = useState(false);
    useEffect(() => {
        setTimeout(() => setShow(true), 250);
    }, []);

    return <div className={`${styles.action} ${show && styles.appear}`}>{emoji} {text}</div>;
}

const Actions: FC<{addItemHandler: (item: ChatItem) => void}> = ({addItemHandler}) => {
    const [activeActions, setActiveActions] = useState<ActionProps[]>([]);

    useEffect(() => {
        (async () => {
            for (let i = 0; i < actions.length; i++) {
                setActiveActions(activeActions => [...activeActions, actions[i]]);
                await sleep(1.5);
            }
        })();
    }, []);

    return <div className={`${styles.actions} ${robotoMono.className}`}>
        {activeActions.map((action, i) => <div key={i} onClick={() => action.handler(addItemHandler)}><Action {...action} /></div>)}
    </div>
};


export const Introduction = () => {
    const [items, setItems] = useState<ChatItem[]>([]);
    const addItem = useCallback((item: ChatItem) => setItems(items => [...items, item]), [setItems, items]);
    const [collapseIntroduction, setCollapseIntroduction] = useState(false);

    useEffect(() => {
        (async () => {
            for (let i = 0; i < messages.length; i++) {
                addItem({type: 'message', message: messages[i]})
                await sleep(1.75);
            }

            addItem({type: 'actions'});
        })();
    }, []);

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
                    {items.map((item, key) => {
                        if (item.type === 'message') {
                            return <Message message={item.message!} key={key} />
                        }

                        if (item.type === 'actions') {
                            return <Actions key={key} addItemHandler={addItem} />
                        }
                    })}
                </div>
                <div  className={`${styles.inputWrapper} ${collapseIntroduction && styles.collapseSection}`}>
                    <input placeholder='Say something nice :)' />
                </div>
            </div>
        </div>
    </div>
}
