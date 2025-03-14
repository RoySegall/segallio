'use client';
import styles from './introduction.module.scss';
import {useState, useEffect, FC, useCallback, useRef} from "react";
import {Message} from "@/Components/Introduction/Message";
import {sleep} from "@/common/uitls";
import {robotoMono} from "@/common/fonts";
import {
    Action,
    ActionsProps,
    ChatItem,
    messages,
    actions,
} from "./interfacesAndTexts";
import {Top} from "@/Components/Introduction/Top";
import {ContentWrapper} from "@/Components/ContentWrapper";

const Action: FC<Action & {addItemHandler: (item: ChatItem) => void}> = ({emoji, text, addItemHandler, handler, disabled }) => {
    const [show, setShow] = useState(false);
    useEffect(() => {
        setTimeout(() => setShow(true), 250);
    }, []);

    return <div className={`${styles.action} ${show && styles.appear} ${!disabled && styles.cursor}`} onClick={async () => {
        if (disabled) {
            return;
        }

        addItemHandler({type: 'actions', actions: [{emoji, text, handler: () => {}}]});
        await sleep(1.25);
        handler(addItemHandler)
    }}>{emoji} {text}</div>;
}

const Actions: FC<ActionsProps> = ({addItemHandler, actions}) => <div className={`${styles.actions} ${robotoMono.className}`}>
    {actions.map((action, i) => <Action key={i} {...action} addItemHandler={addItemHandler} />)}
</div>;


export const Introduction = () => {
    const [collapsed, setCollapsed] = useState(false);
    const [items, setItems] = useState<ChatItem[]>([]);
    const addItem = useCallback((item: ChatItem) => {

        if (item.type === 'actions') {
            item.actions = item.actions.map((action) => ({...action, disabled: true}));
        }

        setItems(items => [...items, item])
    }, [setItems, items]);
    const [showActions, setShowActions] = useState(false);
    const messageRef = useRef<HTMLDivElement>(null);
    const scrollToBottom = useCallback(() => {
        if (messageRef.current) {
            messageRef.current.scrollTop = messageRef.current.scrollHeight + 10000;
        }
    }, [messageRef]);

    useEffect(() => {
        (async () => {
            for (let i = 0; i < messages.length; i++) {
                addItem({type: 'message', message: messages[i]})
                await sleep(1.75);
            }
            setShowActions(true);
            await sleep(.5);
            setCollapsed(true);
        })();
    }, []);

    useEffect(() => {
        scrollToBottom();
    }, [items.length]);

    useEffect(() => {
        sleep(1.25).then(() => {
            scrollToBottom();
        });
    }, [messageRef.current?.scrollHeight]);

    return <div className={`${styles.introductionSection} ${robotoMono.className} ${collapsed && styles.collapsed}`}>
        <ContentWrapper>
            <div className={styles.introductionWrapper}>
                <Top/>

                <div className={`${styles.introduction} ${collapsed && styles.collapsed}`}>
                    <div className={styles.messages} ref={messageRef}>
                        {items.map((item, key) => {
                            if (item.type === 'message') {
                                return <Message message={item.message!} key={key}/>
                            }

                            if (item.type === 'actions') {
                                return <Actions actions={item.actions} key={key} addItemHandler={addItem}/>
                            }
                        })}
                    </div>
                </div>

                <div className={styles.bottomActions}>
                    <div className={styles.actionsWrapper}>
                        {showActions && actions.map((action, index) => <div className={styles.actionWrapper}
                                                                            key={index}>
                            <Action {...action} addItemHandler={addItem}/>
                        </div>)}
                    </div>
                </div>
            </div>
        </ContentWrapper>

    </div>
}
