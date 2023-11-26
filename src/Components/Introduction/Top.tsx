import styles from "./Top.module.scss";
import Image from "next/image";
import picture from "@/Components/Introduction/pictures/avatar.jpg";

export const Top = () => <div className={styles.top}>
    <div className={styles.dot}></div>
    <div className={styles.photo}>
        <Image src={picture} width="75" height="75" alt={'Personal picture'} />
    </div>
    <div className={styles.texts}>
        <span className={styles.name}>Roy Segall</span>
        <span className={styles.active}>Active now</span>
    </div>
</div>
