import {useCallback, useState} from 'react';
import {Handle, Node, NodeProps, Position} from '@xyflow/react';
import './index.css';
import {Input} from 'antd';
import BaseNode from '../base';

export type TextUpdaterNodeType = Node<
    {
        value?: '';
    }
>;

function TextUpdaterNode(props: NodeProps<TextUpdaterNodeType>) {

    const [value, setValue] = useState(props.data.value);

    const onChange = useCallback((evt) => {
        setValue(evt.target.value);
    }, []);

    return (
        <BaseNode description="作者:Alex" selected={props.selected} title={"Text:" + value}>
            <Handle
                type="target"
                position={Position.Left}
                isConnectable={props.isConnectable}
            />
            <div>
                <Input value={value} onChange={onChange} allowClear/>
            </div>
            <Handle
                type="source"
                position={Position.Right}
                id="a"
                isConnectable={props.isConnectable}
            />
        </BaseNode>
    );
}

export default TextUpdaterNode;
