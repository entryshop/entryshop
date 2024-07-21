import {useState} from 'react';
import {Node, NodeProps} from '@xyflow/react';
import BaseNode from '../base';

export type StartNodeType = Node<
    {
        variables?: [];
    }
>;

export default function StartNode(props: NodeProps<StartNodeType>) {
    const [variables, setVariables] = useState(props.data?.variables ?? []);

    return (
        <BaseNode selected={props.selected} title="开始" description="作者: Parse">
            <div>
                <p>{variables}</p>
                <button onClick={() => setVariables(['a', 'b'])}>
                    Increment
                </button>
            </div>
        </BaseNode>
    );
}
