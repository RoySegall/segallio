import styles from './privacePolicy.module.scss';
import {useRef} from "react";

export const PrivacyPolicy = () => {
    const modalRef = useRef<HTMLDialogElement>(null);
    const openModal = () => modalRef.current?.showModal();
    const closeModal = () => modalRef.current?.close();

    return <>
        <dialog className={styles.dialog} ref={modalRef}>
            <div className={styles.content}>
                <p>
                    This portfolio site does not collect any personal information. I cannot track guests individually.
                </p>

                <p>
                    The only data collected is anonymous, aggregated data from an analytics tool to understand general
                    site usage.
                </p>

                <button className="close-button" onClick={closeModal}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         className="lucide lucide-circle-x-icon lucide-circle-x">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m15 9-6 6"/>
                        <path d="m9 9 6 6"/>
                    </svg> Close
                </button>
            </div>

        </dialog>
        <div className={styles.privacyPolicy}>Click here to read the <a href="#" onClick={openModal}>privacy policy</a>
        </div>
    </>
};