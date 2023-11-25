'use client';
import styles from './introduction.module.scss';
import {useState, useEffect, FC, useCallback} from "react";
import {Message} from "@/Components/Introduction/Message";
import {sleep} from "@/common/uitls";
import Image from 'next/image';
import picture from './pictures/avatar.jpg'
import {robotoMono} from "@/common/fonts";
import {Action, ActionsProps, ChatItem, messages, actions} from "@/Components/Introduction/interfacesAndTexts";
import {Top} from "@/Components/Introduction/Top";

const Action: FC<Action & {addItemHandler: (item: ChatItem) => void}> = ({emoji, text, addItemHandler, handler }) => {
    const [show, setShow] = useState(false);
    useEffect(() => {
        setTimeout(() => setShow(true), 250);
    }, []);

    return <div className={`${styles.action} ${show && styles.appear}`} onClick={() => handler(addItemHandler)}>{emoji} {text}</div>;
}

const Actions: FC<ActionsProps> = ({addItemHandler, actions}) => <div className={`${styles.actions} ${robotoMono.className}`}>
    {actions.map((action, i) => <Action key={i} {...action} addItemHandler={addItemHandler} />)}
</div>;


export const Introduction = () => {
    const [items, setItems] = useState<ChatItem[]>([]);
    const addItem = useCallback((item: ChatItem) => setItems(items => [...items, item]), [setItems, items]);

    useEffect(() => {
        (async () => {
            for (let i = 0; i < messages.length; i++) {
                addItem({type: 'message', message: messages[i]})
                await sleep(1.75);
            }

            addItem({type: 'actions', actions});
        })();
    }, []);

    return <div className={`${styles.introductionSection} ${robotoMono.className}`}>
        <div className={styles.introductionWrapper}>
            <Top />

            <div className={`${styles.introduction}`}>
                <div className={styles.messages}>
                    {items.map((item, key) => {
                        if (item.type === 'message') {
                            return <Message message={item.message!} key={key} />
                        }

                        if (item.type === 'actions') {
                            return <Actions actions={item.actions} key={key} addItemHandler={addItem} />
                        }
                    })}
                </div>
            </div>
        </div>
    </div>

    // return <div className={`${styles.introductionSection} ${collapseIntroduction && styles.collapseSection}`}>
    //     <div className={`${styles.introductionWrapper} ${collapseIntroduction && styles.collapseSection}`}>

    //     </div>
    // </div>
}
