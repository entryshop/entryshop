import {Edge, Node, OnConnect, OnEdgesChange, OnNodesChange,} from '@xyflow/react';
import TextUpdaterNode from "./nodes/text-updater";
import StartNode from "./nodes/start";

export enum BlockEnum {
    Start = 'start',
}

export type ValueSelector = string[] // [nodeId, key | obj key path]

export enum InputVarType {
    textInput = 'text-input',
    paragraph = 'paragraph',
    select = 'select',
    number = 'number',
    url = 'url',
    files = 'files',
    json = 'json', // obj, array
    contexts = 'contexts', // knowledge retrieval
    iterator = 'iterator', // iteration input
}

export type CommonNodeType<T = {}> = {
    _connectedSourceHandleIds?: string[]
    _connectedTargetHandleIds?: string[]
    _isSingleRun?: boolean
    _isCandidate?: boolean
    _isBundled?: boolean
    _children?: string[]
    _isEntering?: boolean
    _showAddVariablePopup?: boolean
    _holdAddVariablePopup?: boolean
    _iterationLength?: number
    _iterationIndex?: number
    isIterationStart?: boolean
    isInIteration?: boolean
    iteration_id?: string
    selected?: boolean
    title: string
    desc: string
    type: BlockEnum
    width?: number
    height?: number
} & T

export type InputVar = {
    type: InputVarType
    label: string | {
        nodeType: BlockEnum
        nodeName: string
        variable: string
    }
    variable: string
    max_length?: number
    default?: string
    required: boolean
    hint?: string
    options?: string[]
    value_selector?: ValueSelector
}


export type AppNode = Node;

export type AppState = {
    nodes: AppNode[];
    edges: Edge[];
    onNodesChange: OnNodesChange<AppNode>;
    onEdgesChange: OnEdgesChange;
    onConnect: OnConnect;
    setNodes: (nodes: AppNode[]) => void;
    setEdges: (edges: Edge[]) => void;
};

export const nodeTypes = { textUpdater: TextUpdaterNode, start: StartNode };
